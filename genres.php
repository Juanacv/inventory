<?php
require_once "opts.php";
require_once "helpers.php";
require_once "database.php";
require_once "session.php";
require_once "profile.php";
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="./css/output.css" rel="stylesheet">
</head>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <div class="w-full">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <?php      
            include_once "processgenreslist.php";    
            include_once "processgenre.php";
            include_once "deletegenre.php";
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
                <?php $_SESSION['highlight'] = GENRES; 
                include_once "navside.php"; ?>                
            </div>
            <div class="flex flex-col flex-1 overflow-hidden">
                <?php 
                $_SESSION['nosearch'] = 1;
                include_once "header.php"; ?>
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                    <div class="container px-6 py-8 mx-auto">
                        <h3 class="text-3xl font-medium text-gray-700">Géneros</h3>
        
                        <div class="mt-4">
                            <div class="flex flex-wrap -mx-6">
                                <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                                    <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                                        <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                                            <svg class="w-8 h-8 text-white" viewBox="0 0 28 30" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>
        
                                        <div class="mx-5">
                                            <h4 class="text-2xl font-semibold text-gray-700"><?php echo $totalGenres; ?></h4>
                                            <div class="text-gray-500">Total géneros</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
        
                        <div class="mt-8">
        
                        </div>
        
                        <div class="flex flex-col mt-8">
                            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div
                                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                    <ul
                                        id="infinte-scroll"
                                        data-te-infinite-scroll-init
                                        class="h-[261px] w-80 overflow-y-scroll p-1">
                                            <?php while ($row = $resultsGenres->fetch_assoc()) {?>
                                                <li class="mr-2 flex items-center border dark:border-neutral-600">
                                                    <span class="mx-2 py-1 [&>img]:w-10"
                                                    >                                                            <img class="w-10 h-10 rounded-full"
                                                                src="getimages.php?image=<?php echo $row['image'];?>&type=<?php echo GENRES;?>"
                                                                alt="<?php echo $row['genre'];?>" title="<?php echo $row['genre'];?>">
                                                    </span>
                                                    <span class="mx-2 py-1 w-36"><?php echo $row['genre']; ?></span>
                                                    <span class="mx-4 py-1 [&>a]:w-8"
                                                    ><a href="http://localhost/inventario/dist/genres.php?delete=<?php echo $row['id'] ?>&image=<?php echo $row['image']?>" class="text-red-600 hover:text-indigo-900" id="delete" alt="borrar" title="borrar">X</a>        
                                                    </span>                                            
                                                </li>
                                            <?php } 
                                            $connection->close();?>
                                    </ul>
                                    <div class="pt-1">
                                        <form class="w-full p-1" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" method="POST">
                                            <div class="flex flex-row items-center w-full lg:w-1/2 px-3 mb-6 md:mb-0">
                                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="genre">
                                                Género
                                            </label>
                                            <input class="appearance-none block mx-2 w-54 bg-gray-200 text-gray-700 border <?php if (!empty($messages["genre"])) { echo "border-red-500"; } else { echo "border-gray-300 focus:border-gray-500"; }; ?> rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="genre" name="genre" value="<?php echo isset($row['genre']) ? $row['genre'] : "";?>" type="text" placeholder="Estrategia">
                                            <p class="text-red-500 text-xs italic"><?php echo $messages['genre'] ?></p>
                                            <?php include_once "imageinput.php" ?>
                                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                            Añadir
                                            </button>       
                                           
                                            </div>                       
                                        </form>
                                    </div>
                                </div>           
                            </div>
                        </div>

                    </div>
                </main>
            </div>
        </div>
    </div>
    <script type="application/javascript" src="./js/delete.js"></script>
</body>
</html>
