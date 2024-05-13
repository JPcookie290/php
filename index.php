<?php

$card_deck = [
    ['2', 4], ['3', 4], ['4', 4], ['5', 4], ['6', 4], ['7', 4], ['8', 4], ['9', 4], ['10', 4], ['jack', 4], ['queen', 4], ['king', 4], ['ace', 4]
];

function get_card_value(string $card): int {
    $random = rand(0, 1);
    $value = match($card) {
        '10', 'jack', 'queen', 'king' => 10,
        'ace' => ($random == 1) ? 1 : 11,
        default => (int) $card,
    };
    
    return $value;
};

function get_random_card(&$array): string{
    $random = rand(0, count($array));
    $picked = $array[$random][0];

    return $picked;
};

function deal_cards(){
    # code...
};

function play_round(){
    # code...
};

function who_won(){
    # code...
};

function game(){
    # code...
};

// TEST
echo get_random_card($card_deck) . '<br>';

$test_1 = get_card_value('ace');
$test_2 = get_card_value('ace');
echo "test_1 value: {$test_1}" . '<br>';
echo "test_2 value: {$test_2}" . '<br>';

echo '<prev>';
print_r($card_deck);
echo '</prev>';