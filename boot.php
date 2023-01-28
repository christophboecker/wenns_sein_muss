<?php

if (rex_addon::get('yform')->isAvailable() && !rex::isSafeMode()) {
    rex_yform_manager_dataset::setModelClass(
        'rex_wenns_sein_muss_service',
        wsm_service::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_wenns_sein_muss_group',
        wsm_group::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_wenns_sein_muss_entry',
        wsm_entry::class
    );
    rex_yform_manager_dataset::setModelClass(
        'rex_wenns_sein_muss_protocol',
        wsm_protocol::class
    );
};

rex_extension::register('YFORM_DATA_ADDED', ['wsm','yform_data_added']);
// rex_extension::register('YFORM_DATA_UPDATED', ['wsm','yform_data_added']);
rex_extension::register('YFORM_DATA_DELETED', ['wsm','yform_data_deleted']);
