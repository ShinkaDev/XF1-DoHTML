<?php
/**
 *
 */

class Shinka_DoHTML_BbCode_DoHTML
{
    /**
     * Parse HTML entities.
     */
    public static function render(array $tag, array $rendererStates, XenForo_BbCode_Formatter_Base $formatter)
    {
        $content = $formatter->renderSubTree($tag['children'], $rendererStates);
        return self::_parseHTML($content);
    }

    /**
     * Strip out newline-to-breaks and decode HTML entities.
     * Strip out <code><script>...</script><code> tags to prevent malicious JavaScript.
     */
    protected static function _parseHTML($content) {
        $content = str_replace('<br />', '', $content);
        $content = htmlspecialchars_decode($content);
        $content = preg_replace('/<script.*?>.*?<\/script>/', '', $content);
        return $content;
    }
}