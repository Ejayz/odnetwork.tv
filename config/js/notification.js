var notif = new Notyf({
  duration: 5000,
  ripple: true,
  position: {
    x: "right",
    y: "top",
  },
  dismissible: true,
});
function success(message) {
  notif.success(message);
}
function error(message) {
  notif.error(message);
}
