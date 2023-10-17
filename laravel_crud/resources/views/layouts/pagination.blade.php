<div class="container-fluid d-flex justify-content-center mt-5">
    <div class="wrapper mt-3">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a></li>
                <?php 
                $recordPre=$page-1;
                $recordNext=$page+1;
                if($page==1){
                    $recordNext=3;
                    $recordPre=1;
                }
                else if($page==$totalRecords)
                {
                    $recordNext=$totalRecords;
                    $recordPre=$totalRecords-2;
                }
                ?>
                <?php for ($i = $recordPre; $i <= $recordNext; $i++) { ?>
                <?php if ($i >= 1 && $i <= $totalRecords) { ?>
                <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php } ?>
                <?php } ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
