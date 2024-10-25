let updateBtn = document.querySelector('#update__btn');

// console.log(item);
// console.log(inputId);

updateBtn.addEventListener('click', function(e) {
    let urlUpd = url + '/' + inputId.value;

    if (inputTitle.value.trim() && inputDescription.value.trim()) {

        let amount = !isNaN(inputAmount.value) ? inputAmount.value : 1 ;

        let good = {
            'good': [
                {
                    "title": inputTitle.value,
                    "description": inputDescription.value,
                    "amount": amount
                }
            ]
        }

        console.log(good);

        fetch(urlUpd, {
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
            console.error('Ошибка при изменении:', error); 
        });
    }
})