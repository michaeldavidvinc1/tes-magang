import { fruits } from "./data.js";

// Soal 1
function getOwnedFruits() {
  const fruitNames = fruits.map((fruit) => fruit.fruitName);
  return Array.from(new Set(fruitNames));
}
console.log(getOwnedFruits());

// Soal 2
function getFruitContainers() {
  const buah = {};
  fruits.forEach((fruit) => {
    if (buah[fruit.fruitType]) {
      buah[fruit.fruitType].push(fruit.fruitName);
    } else {
      buah[fruit.fruitType] = [fruit.fruitName];
    }
  });
  const jumlah_wadah = Object.keys(buah).length;
  return {
    jumlah_wadah,
    buah,
  };
}
console.log(getFruitContainers());

// Soal 3
function getTotalStockByContainer() {
  const containerStocks = {};
  fruits.forEach((fruit) => {
    if (containerStocks[fruit.fruitType]) {
      containerStocks[fruit.fruitType] += fruit.stock;
    } else {
      containerStocks[fruit.fruitType] = fruit.stock;
    }
  });
  return containerStocks;
}
console.log(getTotalStockByContainer());

// Soal 4
const komentar = [
  "Terdapat duplikasi data buah dengan fruitId yang sama. Pastikan setiap buah memiliki fruitId yang unik.",
  'Terdapat kesalahan penulisan buah "apel" (huruf kecil) yang seharusnya "Apel" (huruf besar). Sebaiknya konsisten dalam penulisan nama buah.',
];
console.log(komentar);
