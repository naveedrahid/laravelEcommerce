<?php

function add_cart()
{
    $cartCollection = \Cart::getContent();
    return $cartCollection->toArray;
}


?>
