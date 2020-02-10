public function seedEndtitys(){
		// $constants = new \app\test\UtilTest();
		// $constants -> testEntityAliasFunctions();
		$entities = [
			[
				'entity_type' => 'PATIENT',
				'aliases' => [
					[
						'alias_type' => 'FHIR',
						'alias_value' => 'etpqUNNvyjxz2Ml-lO3Vajg3'
					]
				]
			],
			[
				'entity_type' => 'PATIENT',
				'aliases' => [
					[
						'alias_type' => 'FHIR',
						'alias_value' => 'e9WBOFdgNq7.WJbV7V.-ZMg3'
					]
				]
			],
			[
				'entity_type' => 'PATIENT',
				'aliases' => [
					[
						'alias_type' => 'FHIR',
						'alias_value' => 'eX593UQEU9dpTOyhXtsH8-g3'
					]
				]
			]
		];

		// convert the inner elements to postgres notation
		foreach ($entities as &$entity){
			$entity['aliases'] = $this->db->convertArrCustomType($entity['aliases'], ['alias_type', 'alias_value']);
		}
		$stmt = $this->db->prepare('SELECT * FROM to_json(t4m_util_set_emr_entity_aliases(
			:items
		))');
		$stmt->bindValue(':items', $this->db->convertArrCustomType($entities, ['entity_type', 'aliases']));
		$this->db->execute($stmt);

	}
