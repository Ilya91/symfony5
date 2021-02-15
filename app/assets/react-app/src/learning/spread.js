const arr = [1,2,3,4,5];
const arr2 = [9];
const res = Math.max(...arr, ...arr2);
console.log(res);


const shallowCopy = [...arr, ...arr2, 45, 23];
console.log(shallowCopy);
