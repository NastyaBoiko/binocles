const url = 'http://localhost/binocles/api/goods';

let inputTitle = document.querySelector('#title');
let inputDescription = document.querySelector('#description');
let inputAmount = document.querySelector('#amount');
let inputImage = document.querySelector('#image');
let createBtn = document.querySelector('#createBtn');


createBtn.addEventListener('click', function(e) {
    e.preventDefault();

    if (inputTitle.value.trim() && inputDescription.value.trim()) {
        
        let image = (typeof inputImage.files[0] === 'undefined') ? 'freza.png': inputImage.files[0].name;

        let amount = !isNaN(inputAmount.value) ? inputAmount.value : 1 ;

        let good = {
            'good': [
                {
                    "owner_id": 5,
                    "title": inputTitle.value,
                    "description": inputDescription.value,
                    "image": image,
                    "amount": amount
                }
            ]
        }

        // console.log(good);

        fetch(url, {
            method: 'POST',
            body: JSON.stringify(good),
            headers: {
                "Content-Type": "application/json",
              },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            	
            window.location.href = 'index.html';
        })
        .catch(error => { 
            console.error('Ошибка при создании:', error); 
        });
    }
});