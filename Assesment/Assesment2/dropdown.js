const njopData = {
    jakarta: {
        "Kebayoran Baru": 25000000,
        "Cilandak": 20000000,
        "Menteng": 30000000
    },
    bandung: {
        "Cicendo": 15000000,
        "Lengkong": 18000000,
        "Coblong": 20000000
    },
    surabaya: {
        "Tegalsari": 17000000,
        "Rungkut": 14000000,
        "Gubeng": 19000000
    }
};

// Variabel untuk menyimpan NJOP saat ini
let currentNJOP = 0;

// Fungsi untuk mengisi dropdown kecamatan sesuai kota
function populateDistricts() {
    const city = document.getElementById("city").value;
    const districtSelect = document.getElementById("district");

    // Hapus opsi kecamatan sebelumnya
    districtSelect.innerHTML = '<option value="">-- Pilih Kecamatan --</option>';

    if (city && njopData[city]) {
        Object.keys(njopData[city]).forEach(district => {
            const option = document.createElement("option");
            option.value = district;
            option.textContent = district;
            districtSelect.appendChild(option);
        });
    }

    // Reset NJOP dan total harga
    document.getElementById("result").textContent = "NJOP: ";
    document.getElementById("totalPrice").textContent = "Total Harga Tanah: ";
    currentNJOP = 0;
}

// Fungsi untuk menampilkan NJOP berdasarkan kecamatan
function showNJOP() {
    const city = document.getElementById("city").value;
    const district = document.getElementById("district").value;
    const result = document.getElementById("result");

    if (city && district && njopData[city][district]) {
        currentNJOP = njopData[city][district];
        result.textContent = `NJOP: Rp${currentNJOP.toLocaleString("id-ID")},00`;
    } else {
        result.textContent = "NJOP: Data tidak tersedia";
        currentNJOP = 0;
    }

    // Reset total harga tanah
    document.getElementById("totalPrice").textContent = "Total Harga Tanah: ";
}

// Fungsi untuk menghitung total harga tanah
function calculateTotal() {
    const landSize = parseFloat(document.getElementById("landSize").value);
    const totalPrice = document.getElementById("totalPrice");

    if (currentNJOP > 0 && landSize > 0) {
        const total = currentNJOP * landSize;
        totalPrice.textContent = `Total Harga Tanah: Rp${total.toLocaleString("id-ID")},00`;
    } else {
        totalPrice.textContent = "Total Harga Tanah: ";
    }
}
