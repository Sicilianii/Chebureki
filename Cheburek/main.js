$(document).ready(function (){

    /* Удаление */

     document.querySelectorAll('.item-form').forEach(el=> {
        el.addEventListener('submit', event => {
            event.preventDefault();
            let buka = el.querySelector('.item-id').textContent;
            jQuery.post('/provider.php', {action_del: `${buka}`}, function () {
                console.log('ok');
            });
            el.parentElement.remove();
        });
    });

    /* Редактирование товара */

     document.querySelectorAll('.item-edit').forEach(el => {
        el.addEventListener('click', event => {
            let idProduct = event.target.id; /* Сохраняю ID товара к которому привязана кнопка */
            let formEdit = document.querySelector('.modal');
            formEdit.classList.add('visible'); /* Модальное окно появляется */
            formEdit.addEventListener('submit', event => {
                event.preventDefault();
                /* Вытягиваю данные с инпутов */
                let newName = formEdit.querySelector('#input1').value;
                let newPrice = formEdit.querySelector('#input2').value;

                $.ajax({
                    url: 'provider.php',
                    method: 'post',
                    data: {
                        action_edit: idProduct,
                        newPrice: newPrice,
                        newName: `${newName}`
                    },
                    success: function(data){
                        alert(data);
                    }
                });
                /* Скрываю форму после отправки */
                formEdit.classList.remove('visible');
                /* Меняю данные в верстке */
                el.previousElementSibling.querySelector('.item-name').textContent = newName;
                el.previousElementSibling.querySelector('.item-price').textContent = newPrice;
            });
        });
    });
});