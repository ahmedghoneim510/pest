<?php

function sum( $int,  $int1)
{
    return $int + $int1;
}
function sumFloat( $float,  $float1)
{
    return $float + $float1;
}
test('sum', function () {
    $result = sum(1, 2);

    expect($result)->toBe(3);
});


describe('sum', function () {
    it('may sum integers', function () {
        $result = sum(1, 2);

        expect($result)->toBe(3);
    });

    it('may sum floats', function () {
        $result = sum(1.5, 2.5);

        expect($result)->toBe(4.0);
    });
    test('sum', function () {
        $result = sum(1, 2);

        expect($result)->toBe(3);
    });
});


describe('math',function(){
    beforeEach(function(){
        $this->a=1;
        $this->b=2;
    });
    it('may sum integers', function () {
        $result = sum($this->a, $this->b);

        expect($result)->toBe(3);
    });

    it('may sum floats', function () {
        $result = sumFloat(1.5, 2.5);

        expect($result)->not->toBe(4)
       ->toBe(4.0);
    });
});

it('date',function(){
    $expectationDate = new DateTime('2023-09-22');
    $oldestDate = new DateTime('2023-09-21');
    $latestDate = new DateTime('2023-09-23');

    expect($expectationDate)->toBeInstanceOf(DateTime::class)
        ->toBeBetween($oldestDate, $latestDate)
        ->and(1)->toBeTruthy()
        ->and('1')->toBeTruthy()
        ->and('Pest: an elegant PHP Testing Framework')->toContain('Pest', 'PHP', 'Framework')
        ->and([1, 2, 3])->toContainEqual('1')
        ->and([1, 2, 3])->toContainEqual('1', '2','3');

});
beforeEach(function(){
    $this->user =(object) [
        'name' => 'Nuno',
        'is_active' => 'true'
    ];
});
it('checking',function (){

    expect($this->user)->toHaveProperty('name')
        ->and($this->user)->toHaveProperty('name', 'Nuno')
        ->and($this->user)->toHaveProperty('is_active', 'true');
});


it('has emails', function (string $name, string $email) {
    expect($email)->not()->toBeEmpty();
})->with([
    ['Nuno', 'enunomaduro@gmail.com'],
    ['Other', 'other@example.com']
]);
it('throws exception', function () {
    throw new Exception('Something happened.');
})->throws(Exception::class);
