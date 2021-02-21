<?php

function cls()
{
    print("\033[2J\033[;H");
}

echo "hello world";

cls();

echo "world";