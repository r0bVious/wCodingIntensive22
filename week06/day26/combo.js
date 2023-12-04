let comboWrapper = null;
let comboInputElem = null;
let comboMatchesElem = null;
let comboSearchButton = null;

function createComboIn(parentElement) {
    // <div class="overlay"></div>
    // <div id="combo">
    //     <input tabindex="1" type="text" placeholder="Enter the name of a university...">
    //     <div id="matches"></div>
    //     <button tabindex="2">Search</button>
    // </div>
    comboWrapper = document.createElement("div");
    comboWrapper.style.cssText = "display: flex; gap: 0.25rem; position: relative; --combo-border-radius: 5px";
    comboWrapper.id = "combo"; //not actually necessary for our purposes

    comboInputElem = document.createElement("input");
    comboInputElem.tabIndex = "1";
    comboInputElem.type = "text";
    comboInputElem.placeholder = "Enter the name of a city..."
    comboInputElem.style.cssText = `width: 30rem; 
                                    border-radius: var(--combo-border-radius); 
                                    border: 1px solid grey; 
                                    outline: none; 
                                    padding: 0.5rem 0.5rem; 
                                    font-size: inherit;`
    comboWrapper.appendChild(comboInputElem);

    comboMatchesElem = document.createElement("div");
    comboMatchesElem.id = "matches";
    comboMatchesElem.style.cssText = `position: absolute;
                                    top: 2rem;
                                    border: 1px solid lightgray;
                                    background: white;
                                    width: 30rem;
                                    box-sizing: border-box;
                                    display: none;`
    comboWrapper.appendChild(comboMatchesElem);

    comboSearchButton = document.createElement("button");
    comboSearchButton.tabIndex = "2";
    comboSearchButton.innerHTML = "Search";
    comboSearchButton.style.cssText = `background-color: slateblue;
                                        color: white;
                                        width: 200px;
                                        font-size: inherit;
                                        font-weight: inherit;
                                        border: none;
                                        border-radius: var(--combo-border-radius);`
    comboWrapper.appendChild(comboSearchButton);

    parentElement.appendChild(comboWrapper);
}