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

function get_random_card(&$array): string {
    $index = array_rand($array, 1);
    $picked = $array[$index][0];
    $array[$index][1] -= 1;
    if ( $array[$index][1] == 0) {
        array_splice($array, $index, 1);
    }
    return $picked;
};

function get_sum(array $cards): int {
    $points = 0;
    foreach ($cards as $point) {
        // echo $point . '<br>';
        $points += get_card_value($point);
    }
    // echo $points . '<br>';
    return $points;
}

function deal_cards(): array {
    global $card_deck;
    $cards = [];
    array_push( $cards, get_random_card($card_deck), get_random_card($card_deck) );
    return $cards;
};

function play_round($round): int {
    $winner = 0;

    $player1 = deal_cards();
    $player2 = deal_cards();
    $dealer = deal_cards();

    $points_dealer = get_sum($dealer);
    $points_player1 = get_sum($player1);
    $points_player2 = get_sum($player2);

    $result_player1 = who_won($points_player1, $points_dealer);
    $result_player2 = who_won($points_player2, $points_dealer);
    
    // Output
    echo '<br><h3>Round: ' . $round . '</h3>';
    echo 'Cards Dealer:' . '<br>';
    echo "Card 1: {$dealer[0]}, Card 2: {$dealer[1]}, Points: {$points_dealer}" . '<br>';
    echo 'Cards Player One:' . '<br>';
    echo "Card 1: {$player1[0]}, Card 2: {$player1[1]}, Points: {$points_player1}" . '<br>';
    echo 'Cards Player Two:' . '<br>';
    echo "Card 1: {$player2[0]}, Card 2: {$player2[1]}, Points: {$points_player2}" . '<br>';
    if ($result_player1 == true && $points_player1 > $points_player2) {
        echo 'Player One won this round. <br>';
        $winner = 1;
    } elseif ($result_player2 == true && $points_player2 > $points_player1) {
        echo 'Player Two won this round. <br>';
        $winner = 2;
    } elseif ($result_player1 == true && $points_player2 == $points_player1) {
        echo 'Both players have the same amount of points so it is a draw. <br>';
        $winner = 3;
    } else {
        echo 'The Dealer won this round. <br>';
    };

    return $winner;
};

// function who_won(array $player_cards, array $dealer_cards): bool {
//     $player_win = false;
//     // echo 'dealer:<br>';
//     $score_dealer = get_sum($dealer_cards);
//     // echo 'player:<br>';
//     $score_player = get_sum($player_cards);
//     if ($score_player == 21 || $score_dealer > 21 || $score_player > $score_dealer) {
//         $player_win = true;
//     }
//     return $player_win;
// };

function who_won(int $score_player, int $score_dealer): bool {
    $player_win = false;
    if ($score_player == 21 || $score_dealer > 21 || $score_player > $score_dealer) {
        $player_win = true;
    }
    return $player_win;
};

function game(){
    $score_player1 = 0;
    $score_player2 = 0;
    $score_dealer = 0;
    for ($round = 1; $round <=5 ; $round++) { 
        $winner = play_round($round);
        if ($winner == 0) {
            $score_dealer++;
        } 
        if ($winner == 1) {
            $score_player1++;
        }
        if ($winner == 2) {
            $score_player2++;
        }
    }
    if ($score_player1 > $score_player2 && $score_player1 > $score_dealer) {
        echo '<br><h3>' . "Player One is the overall winner with {$score_player1} rounds won." . '</h3>';
    }
    if ($score_player2 > $score_player1 && $score_player2 > $score_dealer) {
        echo '<br><h3>' . "Player Two is the overall winner with {$score_player2} rounds won." . '</h3>';
    }
    if ($score_dealer > $score_player1 && $score_dealer > $score_player2) {
        echo '<br><h3>' . "The House won." . '</h3>';
    }
};

// TEST
// echo get_random_card($card_deck) . '<br>';

// $test_1 = get_card_value('ace');
// $test_2 = get_card_value('ace');

// echo "test_1 value: {$test_1}" . '<br>';
// echo "test_2 value: {$test_2}" . '<br>';

// echo '<pre>';
// print_r(deal_cards());
// echo '<br>' .  who_won(deal_cards(), deal_cards()) . '<br>';
// print_r($card_deck);
// echo '</pre>';

game();