const options = [
  { value: "A", text: "Opsi A: Pertamax" },
  { value: "B", text: "Opsi B: Keduax" },
  { value: "C", text: "Opsi C: Ketigax" },
  { value: "D", text: "Opsi D: Keempatx" }
];

// Fungsi untuk render options
function renderOptions() {
  const container = document.getElementById("options-container");
  
  options.forEach(option => {
    const label = document.createElement("label");
    label.className = "flex items-center gap-2 bg-blue-500 text-white px-4 py-3 rounded cursor-pointer hover:bg-blue-600";
    
    const radio = document.createElement("input");
    radio.type = "radio";
    radio.name = "jawaban";
    radio.value = option.value;
    radio.className = "form-radio w-5 h-5 accent-white";
    
    const span = document.createElement("span");
    span.textContent = option.text;
    
    label.appendChild(radio);
    label.appendChild(span);
    container.appendChild(label);
  });
}
  