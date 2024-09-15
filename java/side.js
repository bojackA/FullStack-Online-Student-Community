const menuItems = document.querySelectorAll('.menu-items');
const messagesNotification = document.querySelector
('#messages-notifications');
const message = document.querySelector('.message');

const  changeActiveItem = () => {
    menuItems.forEach(item => { item.classList.remove('active');
})
} 
menuItems.forEach(item => { 
    item.addEventListener('click', () => {
        changeActiveItem();
        item.classList.add('active');
        if(item.id != 'notifications'){
            document.querySelector('.notifications-popup').Style.display ='none';
        }else{
            document.querySelector('.notifications-popup').Style.display ='block';
          
        }
 
})   
})

