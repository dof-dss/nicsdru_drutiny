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
    $result = $sandbox->drush(['format' => 'json'])->searchApiStatus();
    $complete = TRUE;

    foreach ($result as $search_index) {
        if ($search_index['complete'] != '100%') {
            $complete = FALSE;
        }
    }

    return $complete;
  }

}
