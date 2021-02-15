const user = 'Samuel L. Jackson';
const num = 15;
const txt = `Hello ${user} you ${num + 1} letters inbox ${Date.now()}.`;
console.log(txt);

const template = `
    <div>
        <ul>
            <li>${num}</li>
        </ul>
    </div>
`;
console.log(template);
