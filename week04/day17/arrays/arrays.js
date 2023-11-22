// ===================== Array exercise ==============================

let people = ["Greg", "Mary", "Devon", "James"];

// 1 - Using a loop, iterate through this array and console.log all of the people.

for (let i = 0; i < people.length; i++) {
   console.log(people[i]);
}

// 2 - Remove "Greg" from the array.

people.shift();
console.log(people);

// 3 - Remove "James" from the array.

people.pop();
console.log(people);

// 4 - Add "Matt" to the front of the array.

people.unshift("Matt");
console.log(people);

// 5 - Add Scott to the end of the array.

people.push("Scott");
console.log(people);

// 6 - Using a loop, iterate through this array and after console.log-ing "Mary", exit from the loop.

for (let i = 0; i < people.length; i++) {
   console.log(people[i]);
   if (people[i] === "Mary") {
      break;
   }
}

// 7 - Make a copy of the array using slice. The copy should NOT include "Mary" or "Matt".

let newArray = people.slice(2)
console.log(people);

// 8 - Get the indexOf where "Mary" is located in the people array;

people.indexOf("Mary");
console.log(people.indexOf("Mary"));

// 9 - Create a new variable called withYourname and set it equal to the people array concatenated
//     with the string of "Your name".

let withYourName = people + "Your name";
console.log(withYourName);

// 10 - Given an array of numbers, double each number
{
   const numbers = [1, 2, 3, 4, 5];
   for (i in numbers) {
      numbers[i] = numbers[i]*2;
   }
   console.log(numbers);

}

// 11 - Convert an array of names to uppercase - WHY NO WORKY
{
   const names = ["John", "Alice", "Bob"];
   let newNames = [];
   for (i in names) {
      newNames.push(names[i].toUpperCase());
   }
   console.log(newNames);

}

// 12 - Convert an array of temperatures in Celsius to Fahrenheit
// formula: Celsius × 9/5 + 32
{
   const temperatures = [0, 25, 50, 100];
   for (i in temperatures) {
      temperatures[i] = (temperatures[i] * 9/5) + 32;
   }
   console.log(temperatures);
}

// 13 - Given an array of strings, create a new array containing the lengths of each string.
{
   const strings = ["hello", "world", "wcoding"];
   const stringsLengs = [];

   for (i in strings) {
      stringsLengs.push(strings[i].length);
   }

   console.log(stringsLengs);
}


// 14 - Given an array of numbers, filter out the even numbers.
{
   const numbers = [1, 2, 3, 4, 5];
   for (i in numbers) {
      if (numbers[i] % 2 === 0) {
         numbers.splice([i], 1);
      }
   }
   console.log(numbers);
}

// 15 - Filter out long words from an array of strings, keeping only the strings with a length less than or equal to 5 
{
   const words = ["apple", "banana", "kiwi", "melon", "pie"];
   for (i in words) {
      if (words[i].length > 5) {
         words.splice([i], 1);
      }
   }
   console.log(words);

}

// 16 - Filter out names that start with the letter "A" from an array of names using filter().
{
   const names = ["Alice", "Bob", "Anna", "Alex"];
   for (let i = names.length - 1; i >= 0; i--) {
      if (names[i][0] === "A") {
         names.splice([i], 1);
      }
   }
   console.log(names);

}

// 17 - Check if all numbers in an array are positive using every().
{
   const numbers = [1, 2, -4, 3, 6, -10, 9];

   function isPositive(num) {
      if (num > 0) {
         return true;
      }
   }
   console.log(numbers.every(isPositive));
}

// 18 - Check if all strings in an array have a length greater than 3 using every().
{
   const strings = ["hello", "world", "JavaScript"];

   function greaterThan3(str) {
      if (str.length > 3) {
         return true
      }
   }
   console.log(strings.every(greaterThan3));
}

// 19 - Check if all elements of an array are even numbers using every().
{
   const numbers = [2, 4, 6, 8, 10];

   function areEven(num) {
      if (num % 2 === 0) {
         return true;
      }
   }

   console.log(numbers.every(areEven));
}

// 20 - Check if all names in an array start with the letter "J" using every().
{
   const names = ["John", "Jane", "James"];

   function jWord(str) {
      if (str[0] === "J") {
         return true;
      }
   }

   console.log(names.every(jWord));
}

// 21 - Calculate the sum of all numbers in an array using
{
   const numbers = [1, 2, 3, 4, 5, 6, 7];
   let numSum = 0;

   for (i in numbers) {
      numSum = numSum + numbers[i];
   }

   console.log(numSum);
}