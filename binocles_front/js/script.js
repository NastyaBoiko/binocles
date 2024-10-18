const url = 'http://localhost/binocles/api/goods';

let container = document.querySelector('.main__container');

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

function createCard(item) {
    let col = document.createElement('div');
    col.classList.add('col');

    let card = document.createElement('div');
    card.classList.add('card');
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
    
    let cardBtn = document.createElement('a');
    cardBtn.classList.add('btn', 'btn-primary', 'btn__delete');
    cardBtn.href = "yandex.ru";
    cardBtn.textContent = 'Удалить';

    // console.log(item.id);
    cardBtn.addEventListener('click', (e) => deleteData(e, item, col));
    
    cardBody.appendChild(cardTitle);
    cardBody.appendChild(cardText);
    cardBody.appendChild(cardBtn);
    
    card.appendChild(img);
    card.appendChild(cardBody);

    col.appendChild(card);

    container.appendChild(col);

    return card;
}


fetchData();

