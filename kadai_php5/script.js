
import {MDCMenu} from '@material/menu';

const menu = new MDCMenu(document.querySelector('.mdc-menu'));
const button = document.getElementById('menu-button');

button.addEventListener('click', () => {
  menu.open = !menu.open

});




