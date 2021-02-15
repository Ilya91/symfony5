function square(x) {
    return x*x;
}
console.log(square(5));


const sq = (x) => x*x;
console.log(sq(4));

const array = ['1', '3', '2', '4'];
const res = array.map((el)=>parseInt(el))
    .filter((number) => number%2)
    .reduce((max, value) => Math.max(max, value), 0);
console.log(res);

const three = (x) => {
    return x*x*x;
}
