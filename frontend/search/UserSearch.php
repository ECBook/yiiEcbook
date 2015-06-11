<?php

namespace app\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'benutzergruppe', 'istKlassenvorstand', 'Eltern_e_id', 'istKlassensprecher'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'status', 'created_at', 'updated_at', 'vorname', 'nachname', 'geburtsdatum', 'wohnadresse', 'telefonnummer', 'ort', 'plz', 'Abteilung_abt_bezeichnung', 'Klasse_k_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'benutzergruppe' => $this->benutzergruppe,
            'geburtsdatum' => $this->geburtsdatum,
            'istKlassenvorstand' => $this->istKlassenvorstand,
            'Eltern_e_id' => $this->Eltern_e_id,
            'istKlassensprecher' => $this->istKlassensprecher,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'vorname', $this->vorname])
            ->andFilterWhere(['like', 'nachname', $this->nachname])
            ->andFilterWhere(['like', 'wohnadresse', $this->wohnadresse])
            ->andFilterWhere(['like', 'telefonnummer', $this->telefonnummer])
            ->andFilterWhere(['like', 'ort', $this->ort])
            ->andFilterWhere(['like', 'plz', $this->plz])
            ->andFilterWhere(['like', 'Abteilung_abt_bezeichnung', $this->Abteilung_abt_bezeichnung])
            ->andFilterWhere(['like', 'Klasse_k_name', $this->Klasse_k_name]);

        return $dataProvider;
    }
}
