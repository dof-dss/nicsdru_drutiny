<?php

namespace DofDss\Drutiny\Audit;

use Drutiny\Audit;
use Drutiny\Sandbox\Sandbox;

/**
 * Search API Indexes complete
 */
class SearchApiIndexed extends Audit {

  /**
   * @inheritdoc
   */
  public function audit(Sandbox $sandbox) {
    $result = $sandbox->drush(['format' => 'json'])->sapi-s();

    $json = json_decode($json);
    $incomplete_indexes = FALSE;

    foreach ($json as $search_index) {
        if ($index->complete !== '100%') {
            $incomplete_indexes = TRUE;
        }
    }

    return ($incomplete_indexes) ? Audit::FAIL : Audit::SUCCESS;
  }

}
