const fib = [1, 9, 2, 3, 5, 8, 13];
const [, a, , b, , c] = fib;
console.log(a, b, c);

const line = [[10, 17], [14, 7]];
const [ [x, y], [z, w] ] = line;
console.log(x, y, z, w);

const people = ['chris', 'sandra'];
const [a1, b1, c1 = 'guest'] = people;
const [a2, ...others] = people;
console.log(a1, b1, c1);
console.log(a2, others);


const dict = {
    duck: 'quack',
    dog: 'wuff',
    mouse: 'squeak',
    hamster: 'squeak'
}
