function calculateResult() {
  try {
    display.innerHTML = eval(display.innerHTML);
  } catch {
    display.innerHTML = "Error";
  }
}
