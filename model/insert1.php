<?php
/*
require_once "../connection/Connection.php";

// INSERTAR ESTO ANTES EN WORKBENCH
// insert into categories values (1,"Products","The ultimate tech products provided by Jurado");
// insert into categories values (2,"Services","The ultimate services provided by Jurado");
// insert into categories values (3,"Keycaps","The ultimate PBT Keycaps provided by Jurado");
// insert into user_rols values (1,"admin","the real admin");
// insert into user_rols values (2,"pleb","panza panza panza");

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Array de productos con imágenes
    $products = [
        // pc parts
        
        ["Cable", "Premium-grade cable ensuring reliable connections", 5.99, 100, "src/cable_image", 1],
        ["Case", "Durable computer case providing optimal protection", 39.99, 20, "src/case_image", 1],
        ["Tower case", "Elegant tower case with spacious interior for components", 89.99, 15, "src/tower_case_image", 1],
        ["Power supply", "Dependable power supply for consistent performance", 49.99, 30, "src/power_supply_image", 1],
        ["Plug", "Versatile plug for seamless and universal connectivity", 2.99, 200, "src/plug_image", 1],
        ["Switch", "Efficient network switch ensuring fast data transfer", 29.99, 10, "src/switch_image", 1],
        ["Optical drive", "Versatile optical drive for reading and writing discs", 34.99, 25, "src/optical_drive_image", 1],
        ["Input/output adapter", "Adaptable adapter catering to diverse input/output needs", 12.99, 50, "src/io_adapter_image", 1],
        ["Expansion cards", "Enhance your system with versatile expansion cards", 19.99, 30, "src/expansion_cards", 1],
        ["Drive connector", "Efficiently connect and transfer data with drive connectors", 8.99, 50, "src/drive_connector", 1],
        ["Disk controller", "Optimize disk performance with advanced disk controllers", 29.99, 20, "src/disk_controller", 1],
        ["Cache", "Boost your system speed with high-capacity caches", 14.99, 40, "src/cache", 1],
        ["DVD reader", "Enjoy high-quality DVD reading with reliable DVD readers", 24.99, 15, "src/dvd_reader", 1],
        ["Fan", "Maintain optimal system temperature with powerful fans", 12.99, 25, "src/fan", 1],
        ["Hard disk drive", "Store large amounts of data with reliable hard disk drives", 59.99, 10, "src/hard_disk_drive", 1],
        ["Heat sink", "Efficiently maintain optimal temperature with effective heat sinks", 9.99, 30, "src/heat_sink", 1],
        ["Motherboard", "Build a solid foundation with feature-rich motherboards", 89.99, 5, "src/motherboard", 1],
        ["RAM", "Boost your system's performance with high-speed RAM modules", 49.99, 15, "src/ram", 1],
        ["Sound card", "Enhance audio quality with top-notch sound cards", 34.99, 20, "src/sound_card", 1],
        ["USB port", "Connect seamlessly with versatile USB ports", 6.99, 50, "src/usb_port", 1],
        ["Tower", "Upgrade your system with spacious and durable towers", 79.99, 8, "src/tower", 1],
        ["Laptop", "Experience portability and power with high-performance laptops", 699.99, 3, "src/laptop", 1],

        // peripherals
        ["Monitor", "Vibrant display for an immersive visual experience", 149.99, 20, "src/monitor", 2],
        ["Mouse", "Precision and comfort in an ergonomic design", 19.99, 50, "src/mouse", 2],
        ["Keyboard", "Responsive and ergonomic keyboard for efficient typing", 29.99, 40, "src/keyboard", 2],
        ["USB memory", "Portable storage solution for data on the go", 14.99, 100, "src/usb_memory", 2],
        ["Controller", "Gaming controller for an immersive gaming experience", 39.99, 30, "src/controller", 2],
        ["Headphones", "High-quality headphones for an immersive audio experience", 49.99, 25, "src/headphones", 2],
        ["Microphone", "Crystal-clear microphone for voice recording", 29.99, 20, "src/microphone", 2],
        ["Printer", "Versatile printer for all your printing needs", 99.99, 15, "src/printer", 2],
        ["Projector", "Compact projector for presentations and entertainment", 129.99, 10, "src/projector", 2],
        ["Remote control", "Universal remote control for convenient device management", 9.99, 50, "src/remote_control", 2],
        ["Scanner", "Efficient scanner for digitizing documents", 79.99, 12, "src/scanner", 2],
        ["Speakers", "Powerful speakers for an immersive audio experience", 59.99, 18, "src/speakers", 2],
        ["Stylus", "Precision stylus for creative digital work", 12.99, 30, "src/stylus", 2],
        ["Touchscreen", "Responsive touchscreen for intuitive interactions", 89.99, 15, "src/touchscreen", 2],
        ["USB charger", "Fast and reliable USB charger for your devices", 7.99, 40, "src/usb_charger", 2],
        ["Webcam", "High-resolution webcam for clear video calls", 34.99, 25, "src/webcam", 2],
        ["Laser pointer", "Professional laser pointer for presentations", 14.99, 35, "src/laser_pointer", 2],
        ["Alphanumeric keyboard", "Enhanced keyboard with alphanumeric layout", 39.99, 20, "src/alphanumeric_keyboard", 2],
        ["Memory card", "High-capacity memory card for storage expansion", 17.99, 60, "src/memory_card", 2],
        ["Touchpad", "Intuitive touchpad for seamless navigation", 22.99, 30, "src/touchpad", 2],

        // Keys
        ["Alt key", "Versatile alt key for alternate keyboard functions", 5.99, 100, "src/alt_key", 3],
        ["Arrows", "Navigate seamlessly with responsive arrow keys", 7.99, 80, "src/arrows", 3],
        ["Backspace", "Efficient backspace key for quick corrections", 3.99, 120, "src/backspace", 3],
        ["Caps lock", "Toggle uppercase mode with the reliable caps lock key", 4.99, 90, "src/caps_lock", 3],
        ["Control", "Control key for various keyboard shortcuts", 6.99, 70, "src/control", 3],
        ["Delete", "Swift delete key for efficient content removal", 5.99, 110, "src/delete", 3],
        ["Escape", "Escape key for interrupting or canceling operations", 4.99, 85, "src/escape", 3],
        ["Function keys", "Versatile function keys for customizable actions", 9.99, 60, "src/function_keys", 3],
        ["Modifier key", "Flexible modifier key for modifying other keys' functions", 8.99, 75, "src/modifier_key", 3],
        ["Numeric keypad", "Numeric keypad for convenient numerical input", 12.99, 50, "src/numeric_keypad", 3],
        ["Enter key", "Responsive enter key for confirming input", 5.99, 95, "src/enter_key", 3],
        ["Shift key", "Shift key for accessing uppercase characters", 6.99, 65, "src/shift_key", 3],
        ["Space bar", "Spacious space bar for comfortable typing", 7.99, 80, "src/space_bar", 3],
        ["Tab", "Tab key for easy navigation between fields", 4.99, 90, "src/tab", 3],
        ["Ampersand key", "Ampersand key for typing the symbol '&'", 3.99, 100, "src/ampersand_key", 3],
        ["Apostrophe key", "Apostrophe key for typing the symbol '''", 3.99, 95, "src/apostrophe_key", 3],
        ["Asterisk key", "Asterisk key for typing the symbol '*'", 3.99, 110, "src/asterisk_key", 3],
        ["At key", "At key for typing the symbol '@'", 3.99, 120, "src/at_key", 3],
        ["Parentheses key", "Parentheses key for typing '(' and ')'", 4.99, 75, "src/parentheses_key", 3],
        ["Colon key", "Colon key for typing the symbol ':'", 3.99, 85, "src/colon_key", 3],
        ["Comma key", "Comma key for typing the symbol ','", 3.99, 100, "src/comma_key", 3],
        ["Exclamation point key", "Exclamation point key for typing '!'", 3.99, 95, "src/exclamation_point_key", 3],
        ["Period key", "Period key for typing the symbol '.'", 3.99, 110, "src/period_key", 3],
        ["Hyphen key", "Hyphen key for typing the symbol '-'", 3.99, 120, "src/hyphen_key", 3],
        ["Question mark key", "Question mark key for typing '?'", 3.99, 80, "src/question_mark_key", 3],
        ["Quotation marks key", "Quotation marks key for typing '\"'", 3.99, 90, "src/quotation_marks_key", 3],
        ["Semicolon key", "Semicolon key for typing the symbol ';'", 3.99, 100, "src/semicolon_key", 3],
        ["Slash key", "Slash key for typing the symbol '/'", 3.99, 110, "src/slash_key", 3],
        ["Underscore key", "Underscore key for typing the symbol '_'", 3.99, 85, "src/underscore_key", 3]
    ];

    // Preparar la consulta SQL con un marcador de posición para la imagen
    $sql = "INSERT INTO products (pro_name, pro_description, price, stock, image, x_category_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);



    // Iterar sobre cada producto y ejecutar la inserción
    foreach ($products as $product) {
        // Vincular parámetros y ejecutar la declaración
        $stmt->bindParam(1, $product[0]);
        $stmt->bindParam(2, $product[1]);
        $stmt->bindParam(3, $product[2]);
        $stmt->bindParam(4, $product[3]);

        // Leer la imagen desde el archivo y convertirla a formato binario
        $extensions = ['.png', '.jpg', '.jpeg'];
        $imagePath = $product[4];

        foreach ($extensions as $extension) {
            if (file_exists($imagePath . $extension)) {
                $imagePath .= $extension;
                break;
            }
        }
        $imageData = file_get_contents($imagePath);

        // Vincular la imagen como un parámetro de tipo BLOB
        $stmt->bindParam(5, $imageData, PDO::PARAM_LOB);

        $stmt->bindParam(6, $product[5]);

        $stmt->execute();

        // Imprimir mensaje de éxito
        echo "Se ha insertado el producto con imagen: " . $product[0] . "<br>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$pdo = null;

?>