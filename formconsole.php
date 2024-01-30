<?php
require_once "database.php";
require_once "helpers.php";
require_once "session.php";
require_once "opts.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
	<link href="./css/output.css" rel="stylesheet">
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <?php 
        $profile = checkSession($connectionData);
    ?>
    <div class="w-full">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <?php if (!empty($profile)) {
            $portrait = PORTRAITSDIR.$profile['portrait'];
            include "proccessconsole.php";            
            if (!empty($_POST)) $row = $_POST;
        ?>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false" class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
        
            <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-8">
                    <div class="flex items-center">
                        <svg class="w-12 h-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"></path>
                        </svg>
                        
                        <span class="mx-2 text-2xl font-semibold text-white">Inventario</span>
                    </div>
                </div>
        
                <nav class="mt-10">
                <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="http://localhost/inventario/dist/consoles.php">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                        </svg>
        
                        <span class="mx-3">Consolas</span>
                    </a>
        
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="#">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                            </path>
                        </svg>
        
                        <span class="mx-3">Videojuegos</span>
                    </a>
        
                    <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                        href="#">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
        
                        <span class="mx-3">Generos</span>
                    </a>
        
                    <a class="flex items-center px-6 py-2 mt-4 bg-gray-700 bg-opacity-25 text-gray-100"
                        href="#">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
        
                        <span class="mx-3">Añadir consola</span>
                    </a>
                </nav>
            </div>
            <div class="flex flex-col flex-1 overflow-hidden">
                <?php 
                $_SESSION['nosearch'] = 0;
                include "header.php"; ?>
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container px-6 py-8 mx-auto">
                        <h3 class="text-3xl font-medium text-gray-700">Añadir consola</h3>
                        <div class="mt-8">
                        </div>
                        <div class="flex flex-col mt-8">
                            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div
                                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-300 shadow sm:rounded-lg">
                                    <form class="w-full max-w-lg p-1" action="<?php echo $_SERVER["PHP_SELF"];?>?console=<?php echo isset($_GET['console']) ? $_GET['console']  : "";?>" enctype="multipart/form-data" method="POST">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                                Nombre consola
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border <?php if (!empty($messages["consolename"])) { echo "border-red-500"; } else { echo "border-gray-300 focus:border-gray-500"; }; ?> rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="consolename" name="consolename" value="<?php echo isset($row['consolename']) ? $row['consolename'] : "";?>" type="text" placeholder="Super Nintendo">
                                            <p class="text-red-500 text-xs italic"><?php echo $messages['consolename'] ?></p>
                                            </div>
                                            <div class="w-full md:w-1/3 px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                Precio adquisición
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border <?php if (!empty($messages["price"])) { echo "border-red-500"; } else { echo "border-gray-300 focus:border-gray-500"; }; ?> rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="price" name="price" type="number" min="0" max="100000" value="<?php echo isset($row['price']) ? $row['price'] : "";?>" placeholder="10">
                                            <p class="text-red-500 text-xs italic"><?php echo $messages['price'] ?></p>
                                            </div>
                                            <div class="w-full md:w-1/3 px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                                Fabricante
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border <?php if (!empty($messages["maker"])) { echo "border-red-500"; } else { echo "border-gray-300 focus:border-gray-500"; }; ?> rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="maker" name="maker" value="<?php echo isset($row['maker']) ? $row['maker'] : "";?>" type="text" placeholder="Nintendo">
                                            <p class="text-red-500 text-xs italic"><?php echo $messages['maker'] ?></p>
                                            </div>                                            
                                        </div>
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                                Imagen
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border <?php if (!empty($messages["consoleimage"])) { echo "border-red-500"; } else { echo "border-gray-300 focus:border-gray-500"; }; ?> rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="image" name="image" type="file">
                                            <p class="mt-1 text-sm text-black-500 dark:text-black-300" id="file_input_help">PNG, JPG, JPEG (MAX.1000x1000px).</p>
                                            <p class="text-red-500 text-xs italic"><?php echo $messages['consoleimage'] ?></p>  
                                            <?php if (isset($row['image'])) { ?><input type="hidden" name="oldimage" value="<?php echo $row['image']; ?>"><?php } ?>
                                        </div>
                                        </div>
                                        <div class="flex flex-wrap -mx-3 mb-2">
                                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                                    Fecha adquisición
                                                </label>
                                                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border <?php if (!empty($messages["dateadquisition"])) { echo "border-red-500"; } else { echo "border-gray-300 focus:border-gray-500"; }; ?> rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="dateadquisiton" name="dateadquisition" value="<?php echo isset($row['dateadquisition']) ? date('Y-m-d',strtotime($row['dateadquisition'])) : "";?>" type="date" placeholder="">                                                
                                                <p class="text-red-500 text-xs italic"><?php echo $messages["dateadquisition"]; ?></p>
                                            </div>
                                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                                    Comentarios
                                                </label>
                                                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border <?php if (!empty($messages["comment"])) { echo "border-red-500"; } else { echo "border-gray-300 focus:border-gray-500"; }; ?> rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="comment" name="comment"  placeholder="Comentarios"><?php echo isset($row['comment']) ? $row['comment'] : ""; ?></textarea>
                                                <p class="text-red-500 text-xs italic"><?php echo $messages["comment"]; ?></p>                                                
                                            </div>
                                        </div>
                                        <input type="hidden" name="owner_id" id="owner_id" value="<?php echo $profile['ownerIdEncoded'];?>">
                                        <?php if (isset($row['id'])) { ?><input type="hidden" name="consoleid" value="<?php echo $row['id']; ?>"><?php } ?>
                                        <div class="flex items-center justify-between">
                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                            <?php if (isset($row['id'])) { ?>Actualizar<?php } else { ?>Añadir<?php } ?>
                                            </button>       
                                        </div>                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <?php } else { ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">¡Error!</strong>
                <span class="block sm:inline">Parece que no estás logueado.</span>
                <a href="http://localhost/inventario/dist/index.php">Volver al login</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
