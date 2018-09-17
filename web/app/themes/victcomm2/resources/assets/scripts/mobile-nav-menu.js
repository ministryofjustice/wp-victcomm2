
export default function() {
  const self = this;
  self.body = document.querySelector('body');

  this.openMenu = () => {
    self.body.classList.add('mobile-nav-menu-open');
  };

  this.closeMenu = () => {
    self.body.classList.remove('mobile-nav-menu-open');
  };

  this.closeMenuOnClick = (event) => {
    self.closeMenu();
    event.preventDefault();
    event.stopPropagation();
    return false;
  };

  this.addCurrentPageItemClickHandler = () => {
    const currentPageItems = document.querySelectorAll('.nav-primary--mobile .current_page_item:not(.current_page_ancestor)');
    if (currentPageItems.length > 0) {
      currentPageItems[0].addEventListener('click', ()=>{ self.closeMenuOnClick(event); });
    }
  };

  this.addCloseMenuButtonClickHandler = () => {
    document.querySelector('.nav-primary__close-button').addEventListener('click', ()=>{ self.closeMenuOnClick(event); });
  };

  this.init = () => {
    self.addCurrentPageItemClickHandler();
    document.querySelector('.mobile-nav-menu-overlay').addEventListener('click', ()=>{ self.closeMenu(); });
    document.querySelector('.mobile-nav-menu-button').addEventListener('click', this.openMenu);

    const mq = window.matchMedia('all and (max-width: 768px)');

    self.addCloseMenuButtonClickHandler();

    // Close mobile menu for portrait width and above
    mq.addListener(function(changed) {
      if(!changed.matches) {
        self.closeMenu();
      }
    });
  }
}
