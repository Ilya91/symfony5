// Rest parameter

function max(...numbers) {
    console.log(numbers);
}
max(1,2,3);
max(1);
max();

function max(a,b, ...numbers) {
    console.log(numbers);
}
max(1,2,3);
