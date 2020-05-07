<?php
/**
 * Generates the hands
 *
 * @return array containing the two selected hands
 */
function dealer() {
    $deck = deckBuilder();
    $hand1 = [
        cardPicker($deck),
        cardPicker($deck),
    ];
    $hand2 = [
        cardPicker($deck),
        cardPicker($deck),
    ];
    return ['hand1' => handScoreBuilder($hand1), 'hand2' => handScoreBuilder($hand2)];
}
/**
 * Builds a deck array
 *
 * @return array containing the complete deck
 */
function deckBuilder() {
    $suits = ['spades', 'clubs', 'hearts', 'diamonds'];
    $numbers = [
        'ace'   => 11,
        2       => 2,
        3       => 3,
        4       => 4,
        5       => 5,
        6       => 6,
        7       => 7,
        8       => 8,
        9       => 9,
        10      => 10,
        'jack'  => 10,
        'queen' => 10,
        'king'  => 10,
    ];
    $deck = [];
    foreach($suits as $suit) {
        foreach($numbers as $key => $number) {
            $deck[] = [
                'card' => $key . ' of ' . $suit,
                'score' => $number,
            ];
        }
    };
    return $deck;
}

/*
 * Picks a card at random from the deck, and removes the card once picked
 *
 * @param array &$deck an array holding all possible cards
 *
 * @return array contains the selected card and it's score
 */
function cardPicker(array &$deck): array {
    $randomCardKey = array_rand($deck);
    $card = $deck[$randomCardKey];
    unset($deck[$randomCardKey]);
    return $card;
}
/*
 * Combines two cards into a hand with a score
 *
 * @param array $cards the cards in the hand
 *
 * @return array both cards combined with associated hand score
 */
function handScoreBuilder(array $cards): array {
    $hand = [
        'cards' => $cards,
        'score' => $cards[0]['score'] + $cards[1]['score'],
    ];
    return $hand;
}
function calculateWinner(array $hand1, array $hand2): string {
    if ($hand1['score'] == $hand2['score']) {
        return '<h3>Draw!</h3>';
    } else if ($hand1['score'] > 21) {
        return '<h3>Player 2 Wins!</h3>';
    } else if ($hand1['score'] > $hand2['score'] || $hand2['score'] > 21) {
        return '<h3>Player 1 Wins!</h3>';
    } else {
        return '<h3>Player 2 Wins!</h3>';
    }
}
$players = dealer();
$player1 = $players['hand1'];
$player2 = $players['hand2'];
echo 'Player One <br>';
echo $player1['cards'][0]['card'] . '<br>';
echo $player1['cards'][1]['card'] . '<br>';
echo $player1['score'] . '<br>';
echo 'Player Two <br>';
echo $player2['cards'][0]['card'] . '<br>';
echo $player2['cards'][1]['card'] . '<br>';
echo $player2['score'] . '<br>';
echo 'score <br>';
echo calculateWinner($player1, $player2);