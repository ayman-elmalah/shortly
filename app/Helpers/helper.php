<?php

/**
 * Generate unique for table
 *
 * @params string $table
 * @params string $column
 * @return mixed
 */
function unique($table, $column) {
    $short_url = substr(md5(mt_rand()),0,8);
    $isset = \Phplite\Database\Database::table($table)->where($column, '=', $short_url)->first();
    return $isset ? unique($table, $column) : $short_url;
}