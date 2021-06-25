
function calculate(val, curr, i) {
  const from_currency = curr;
  const to_currency = 'IDR';
  const awal = val;
  var akhir = 0;

  console.log(awal);
  console.log(from_currency);
  
  fetch(`https://api.exchangerate-api.com/v4/latest/${from_currency}`)
  .then(res => res.json())
  .then(res => {
  const rate = res.rates[to_currency];
  akhir = (awal * rate).toFixed(2);
  console.log(akhir);
  document.getElementById("price"+i).innerHTML = akhir;
  })
 }