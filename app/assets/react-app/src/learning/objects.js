const x = 10;
const y = 30;

const p = {
    x, y
}

const obj = {
    draw(x){

    }
}


const def = {
    host: 'localhost',
    dbName: 'blog',
    user: 'admin'
}

const opts = {
    user: 'john',
    pass: '123'
}

Object.assign({}, def, opts);
console.log(def);
