const person = {
    firstName: 'Peter',
    lastName: 'Smith',
    age: 27
}
const {firstName, lastName} = person;
console.log(firstName, lastName);


const person2 = {
    name: {
        first: 'Samuel',
        last: 'L. Jackson',
    },
    age: 27
}
const {name: {first: one, last: two}} = person2;
console.log(one, two);


const { role = 'user' } = person;
console.log(role);



function connect({
    host = 'localhost',
    port = 12345,
    user= 'guest' } = {}) {
    console.log('user:', user, ' port:', port, ' host:', host)
}

connect({port: 345334});


const dict = {
    duck: 'quack',
    dog: 'wuff',
    mouse: 'squeak'
};

const { duck, ... otherAnimals } = dict;
console.log(duck, otherAnimals);
