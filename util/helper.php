<?php

class Helper
{
    public static function clean_html($html, array $whitelist)
    {
        libxml_use_internal_errors(true) and libxml_clear_errors();

        if (is_object($html)) {
            if ($html->hasChildNodes()) {
                foreach (range($html->childNodes->length - 1, 0) as $i) {
                    self::clean_html($html->childNodes->item($i), $whitelist);
                }
            }

            if (! in_array($html->nodeName, $whitelist)) {
                $fragment = $html->ownerDocument->createDocumentFragment();

                while ($html->childNodes->length > 0) {
                    $fragment->appendChild($html->childNodes->item(0));
                }

                return $html->parentNode->replaceChild($fragment, $html);
            }

            while ($html->hasAttributes()) {
                $html->removeAttributeNode($html->attributes->item(0));
            }
        } elseif ($dom = DOMDocument::loadHTML($html)) {
            self::clean_html($dom->documentElement, $whitelist);
            return preg_replace('~<(?:!DOCTYPE|/?(?:html|body))[^>]*>\s*~i', '', $dom->saveHTML());
        }
    }
}
