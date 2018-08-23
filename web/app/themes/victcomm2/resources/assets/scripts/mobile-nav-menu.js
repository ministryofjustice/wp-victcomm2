
export default function() {
  const self = this;
  self.container = document.querySelector('body');
  self.overlay = document.querySelector('.mobile-nav-menu-overlay');
  self.overlay.addEventListener('click', ()=>{ self.deactivate(); });

  this.activate = () => {
    self.container.classList.add('mobile-nav-menu-active');
  };

  this.deactivate = () => {
    self.container.classList.remove('mobile-nav-menu-active');
  };

  document.querySelector('.mobile-nav-menu-button').addEventListener('click', this.activate);
}
