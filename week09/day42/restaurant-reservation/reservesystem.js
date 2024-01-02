const reservationSystem = document.querySelector("#reservationSystem");
let proposedDate = [];
let partySize = 2;

function getPartySize() {
    reservationSystem.innerHTML = "";
    reservationSystem.innerHTML = `<div>How many are in your party?</div>`;

    const partyNum = document.querySelector("#partyNum");
    partyNum.innerHTML = partySize;

    const partyDown = document.querySelector(".subtract");
    partyDown.addEventListener("click", () => {
        partySize--;
        partyNum.innerHTML = partySize;
    });
    const partyUp = document.querySelector(".add");
    partyUp.addEventListener("click", () => {
        partySize++;
        partyNum.innerHTML = partySize;
    });

    const partyContainer = document.querySelector(".counter_container");
    partyContainer.classList.toggle("visible");
    reservationSystem.appendChild(partyContainer);

    const confirmPartySize = document.querySelector("#confirmPartySize");
    confirmPartySize.addEventListener("click", () => generateMonthSlots());
}

function generateMonthSlots() {
    // const monthsArray = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
    const monthsArray = [["Jan", 1], ["Feb", 2], ["Mar", 3], ["Apr", 4], ["May", 5], ["Jun", 6], ["Jul", 7], ["Aug", 8], ["Sep", 9], ["Oct", 10], ["Nov", 11], ["Dec", 12]];
    
    reservationSystem.innerHTML = "";
    reservationSystem.style.flexDirection = "row";

    for (let i = 0; i < monthsArray.length; i++) {
        const newMonth = document.createElement("div");
        newMonth.classList.add("month");
        newMonth.id = monthsArray[i][0];
        newMonth.innerHTML = monthsArray[i][0];
        newMonth.addEventListener("click", () => generateDaySlots(monthsArray[i]));
        reservationSystem.appendChild(newMonth);
    }
}

function generateDaySlots(inMonth) {
    const monthsDays = {"Jan": 31, "Feb": 28, "Mar": 31, "Apr": 30, "May": 31, "Jun": 30, "Jul": 31, "Aug": 31, "Sep": 30, "Oct": 31, "Nov": 30, "Dec": 31};
    proposedDate[0] = inMonth[1];

    reservationSystem.innerHTML = "";
    const numDays = monthsDays[inMonth[0]];

    for (let i = 1; i <= numDays; i++) {
        let newDay = document.createElement("div");
        newDay.classList.add("day");
        newDay.id = i;
        newDay.innerHTML = i;
        newDay.addEventListener("click", () => generateTimeTable(i));
        reservationSystem.appendChild(newDay);
    }
}

function generateTimeTable(inDay) {

    proposedDate[1] = inDay;
    (async function() {
        try {
          const bodyContent = [proposedDate[0], proposedDate[1]];
        
          const response = await fetch(`index.php?route=checkExistingReservations`, {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(bodyContent)
          });
      
          if (!response.ok) throw new Error('Network response was not ok');
      
          const data = await response.json();
          console.log('Received data:', data);

            reservationSystem.style.flexDirection = "column";
            reservationSystem.innerHTML = "";
            
            for (let i = 1; i < 14; i++) {
                const timeBlock = document.createElement("div");
                timeBlock.classList.add("timeblock");
                timeBlock.id = (i + 10);
                let hour = i + 10;
                console.log(data[hour]);
                console.log(partySize);
                if (data[hour] < partySize) {
                    timeBlock.style.background = "rgb(255, 0, 0)";
                    timeBlock.innerHTML = "Not Available";
                } else {
                    timeBlock.innerHTML = (i + 10) + "00hours";
                    timeBlock.addEventListener("click", confirmReservation);
                }
                reservationSystem.appendChild(timeBlock);
            }
      
        } catch (error) {
          console.error('Error:', error);
        }
      })();

}

function confirmReservation(event) {
    proposedDate[2] = parseInt(event.target.id);
    reservationSystem.innerHTML = "";

    const confirmReserve = document.createElement("div");
    confirmReserve.id = "confirm-reservation";
    confirmReserve.innerHTML = `Your reservation is for a party of ${partySize} on ${proposedDate[0]} / ${proposedDate[1]} @ ${proposedDate[2]} - fill in the info below to finalize your reservation!`;

    const hiddenPartyNum = document.querySelector("#form-partyNum");
    hiddenPartyNum.value = partySize;

    const hiddenReservationTime = document.querySelector("#reservationTime");
    hiddenReservationTime.value = JSON.stringify(proposedDate);
 
    const addForm = document.querySelector(".confirmForm");
    addForm.classList.toggle("visible");
    const subBut = document.querySelector("#submitButton");
    const resvCode = document.querySelector("#resvCode");

    confirmReserve.appendChild(addForm);
    reservationSystem.appendChild(confirmReserve);

    subBut.addEventListener("click", async () => {
            try {            
              const response = await fetch(`index.php?route=createResvCode`, {
                method: 'POST',
              });
          
            console.log(response);
          
            if (!response.ok) throw new Error('Network response was not ok');
        
            const data = await response.json();
            console.log('Received data:', data);
            
            resvCode.value = data;
            addForm.submit();

            reservationSystem.innerHTML = "yay";
            reservationSystem.addEventListener("click", () => reservationSystem.style.display = "none");
        } catch (error) {
            console.error('Error:', error);
        }
    });
}
