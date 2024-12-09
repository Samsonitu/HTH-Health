// Begin handle search services
// (add data-serviceID for every service__items)
const serviceList = $$('.service__list .service__items'); 
const searchServiceInput = $('#search-service-input'); 
const serviceListContainer = $('.service__list');

const noResultElement = document.createElement('label');
noResultElement.textContent = "Không có dịch vụ trùng khớp";
noResultElement.style.display = 'none'; 
serviceListContainer.appendChild(noResultElement);

searchServiceInput.addEventListener('input', () => {
    const query = searchServiceInput.value.toLowerCase();
    let hasSearchResult = false;

    // Duyệt qua danh sách dịch vụ
    serviceList.forEach((service) => {
        const serviceName = service.querySelector('label').textContent.toLowerCase();
        if (serviceName.includes(query)) {
            service.classList.remove('hidden'); 
            hasSearchResult = true; 
        } else {
            service.classList.add('hidden'); 
        }
    });

    noResultElement.style.display = hasSearchResult ? 'none' : 'block';
});
// End search services


// Start processing the service registration button
const serviceCheckBtnList = $$('.service__list input[type="checkbox"]');
const registeredServiceContainer = $('textarea[name="selectedServiceNames"]');
const hiddenServiceIDs = $('#book #selectedServiceIDs');
const hiddenTotalPrice = $('#book #total-price-input');
let selectedServices = [];
let totalPrice = 0;

serviceCheckBtnList.forEach((serviceCheckBtnItem, index) => {
    serviceCheckBtnItem.addEventListener('change', () => {
        const serviceID = serviceList[index].getAttribute('data-service-id');
        const servicePrice = parseFloat(serviceList[index].getAttribute('data-service-price'));

        if(serviceCheckBtnItem.checked) {
            selectedServices.push(serviceID);
            totalPrice += servicePrice;
        }else {
            selectedServices = selectedServices.filter(id => id !== serviceID);
            totalPrice -= servicePrice;
        }
        updateRegisteredServiceContainer();
        updateTotalPrice();
    });
});

function updateRegisteredServiceContainer() {
    const selectedServiceNames = selectedServices.map(serviceID => {
        const serviceItem = Array.from(serviceList).find(
            item => item.getAttribute('data-service-id') == serviceID
        );
        return serviceItem ? serviceItem.getAttribute('data-service-name') : '';
    });
    registeredServiceContainer.value = selectedServiceNames.join(' - ');
    hiddenServiceIDs.value = JSON.stringify(selectedServices);
}

function updateTotalPrice() {
    const totalPriceElement = $('#total-price');
    totalPriceElement.innerText = formatCurrencyVND(totalPrice); 
    hiddenTotalPrice.value = totalPrice;
}
// End processing the service registration button

