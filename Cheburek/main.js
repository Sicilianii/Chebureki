$(document).ready(function (){

    /* Удаление */

     function delProduct() {
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
     }

    /* Редактирование товара */

     function editProduct() {
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
     }

    delProduct();
    editProduct();

    /* Добавление */

    let formNew = document.querySelector('.new-cheb');
    formNew.addEventListener('submit', event => {
        event.preventDefault();
        let newName = formNew.querySelector('#newN').value;
        let newPrice = formNew.querySelector('#newP').value;
        let newID = formNew.querySelector('#newID').value;
        $.ajax({
            url: 'provider.php',
            method: 'post',
            data: {
                action_new: newID,
                newPrice: newPrice,
                newName: `${newName}`
            },
            success: function(data){
                alert(data);
            }
        });
        const newCheburek = `
            <div class="item">
                <form class="item-form">
                    <div class="item-info">
                        <h1 class="item-name">${newName}</h1>
                        <h2 class="item-price">${newPrice}</h2>
                        <span class="item-id">${newID}</span>
                        <button type="submit" class="item-button">Delete</button>
                    </div>
                </form>
                <button type="submit" class="item-edit" id="${newID}">Edit</button>
            </div>
        `;
        let boxCheburek = document.querySelector('.box-item');
        boxCheburek.insertAdjacentHTML("afterbegin", newCheburek);
        delProduct();
        editProduct();
    });
});