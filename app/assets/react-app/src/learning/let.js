let name = 'John'
name = 'Bob'
console.log(name)

const names = ['one', 'two'];
names.push('three');
console.log(names);

for (var i = 0; i < 3; i++){
    setTimeout(function () {
        console.log(i);
    }, i*100);
}

for (let i = 0; i < 3; i++){
    setTimeout(function () {
        console.log(i);
    }, i*100);
}
