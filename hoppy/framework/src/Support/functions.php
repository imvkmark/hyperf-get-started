<?php


if (!function_exists('command_exists')) {
    /**
     * 检测命令是否存在
     * @param $cmd
     * @return bool
     */
    function command_exists($cmd): bool
    {
        try {
            $returnVal = shell_exec("which $cmd");

            return !empty($returnVal);
        } catch (Exception $e) {
            return false;
        }
    }
}