const url = 'http://localhost/binocles/api/goods';

let container = document.querySelector('.main__container');

let inputId = document.querySelector('#id');
let inputTitle = document.querySelector('#title');
let inputDescription = document.querySelector('#description');
let inputAmount = document.querySelector('#amount');
let inputImage = document.querySelector('#image');

// Через .then

// fetch(url, {
//     'method': 'GET'
// })
// .then(response => {
//     if (!response.ok) {
//         throw new Error('Network response was not ok');
//     }
//     return response.json(); // Преобразуем ответ в JSON-Promise
// })
// .then(data => {
//     data.goods.forEach(item => {
//         createCard(item)
//     });
// });

// Через async await

async function fetchData() {

    const response = await fetch(url, {
        method: 'GET'
    });

    const data = await response.json();

    data.goods.forEach(item => {
        createCard(item)
    });
    return data;
}

async function deleteData(e, item, col) {
    e.preventDefault();

    let delUrl = url + '/' + item.id;
    
    fetch(delUrl, {
        method: 'DELETE'
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        col.remove();
    })
    .catch(error => { 
        console.error('Ошибка при удалении:', error); 
    });
}

function showData(e, item) {
    e.preventDefault();

    inputId.value = item.id;
    inputTitle.value = item.title;
    inputDescription.value = item.description;
    inputAmount.value = item.amount;
}

function createCard(item) {
    let col = document.createElement('div');
    col.classList.add('col');

    let card = document.createElement('div');
    card.classList.add('card');
    card.setAttribute('id', item.id);
    // card.style.width = '18rem';
    card.style.marginBottom = '10px';
    
    let img = document.createElement('img');
    img.classList.add('card-img-top');
    img.src = 'img/' + item.image;
    img.alt = item.image;
    
    let cardBody = document.createElement('div');
    cardBody.classList.add('card-body');
    
    let cardTitle = document.createElement('h5');
    cardTitle.classList.add('card-title');
    cardTitle.textContent = item.title;
    
    let cardText = document.createElement('p');
    cardText.classList.add('card-text');
    cardText.textContent = item.description;

    let cardAmount = document.createElement('p');
    cardAmount.classList.add('card-text');
    cardAmount.textContent = `Количество на складе: ${item.amount}`;
    
    let cardBtnDelete = document.createElement('a');
    cardBtnDelete.classList.add('btn', 'btn-danger', 'btn__delete');
    cardBtnDelete.href = "yandex.ru";
    cardBtnDelete.textContent = 'Удалить';

    let cardBtnUpdate = document.createElement('a');
    cardBtnUpdate.classList.add('btn', 'btn-warning', 'btn__update');
    cardBtnUpdate.setAttribute('data-bs-toggle', 'modal');
    cardBtnUpdate.setAttribute('data-bs-target', '#staticBackdrop');
    cardBtnUpdate.setAttribute('id', `update${item.id}`);
    cardBtnUpdate.href = "yandex.ru";
    cardBtnUpdate.textContent = 'Изменить';

    cardBtnUpdate.addEventListener('click', (e) => showData(e, item));

    // console.log(item.id);
    cardBtnDelete.addEventListener('click', (e) => deleteData(e, item, col));
    
    cardBody.appendChild(cardTitle);
    cardBody.appendChild(cardText);
    cardBody.appendChild(cardAmount);
    cardBody.appendChild(cardBtnDelete);
    cardBody.appendChild(cardBtnUpdate);
    
    card.appendChild(img);
    card.appendChild(cardBody);

    col.appendChild(card);

    container.appendChild(col);

    return card;
}


fetchData();



