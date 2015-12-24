<?php

/**
 * Copyright (C) 2015 FormHandler
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 */

namespace FormHandler;

/**
 * Utils
 *
 * @author Marien den Besten
 */
class Utils
{
    /**
     * This function does charset safe conversion of HTML entities
     *
     * @author Marien den Besten
     * @param string $string The input string
     * @return string The converted string
     */
    static public function html($string, $flags = null, $charset = 'UTF-8')
    {
        $flags = (!is_null($flags)) ? $flags : ENT_COMPAT | ENT_IGNORE;
        return @htmlentities($string, $flags, $charset);
    }

    /**
     * Use this function to remove trailing zeros received from the bc functions
     *
     * @author Marien den Besten
     * @param string $input
     * @return string
     */
    static public function removeBcTrailingZeros($input)
    {
        $patterns = array('/[\.][0]+$/','/([\.][0-9]*[1-9])([0]*)$/');
        $replaces = array('','$1');
        return preg_replace($patterns,$replaces,$input);
    }
}
