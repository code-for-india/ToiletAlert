package cfi.hv.com.toiletalert;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.TextView;

import org.json.JSONObject;

import cfi.hv.com.toiletalert.dto.Toilet;

public class ToiletDetailsActivity extends AppCompatActivity implements View.OnClickListener {
    private TextView tvName;
    private TextView tvAddress;
    private TextView tvWritereview;
    private TextView tvReadReview;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_toilet_details);
        findViews();
        try {
            String data = getIntent().getExtras().getString("Data");
            Toilet toilet = new Toilet();
            toilet.fromJSON(data);
            tvName.setText(toilet.getName());
            tvAddress.setText(toilet.getAddress1() + ", " + toilet.getAddress2() + ", " + toilet.getCity() + ", " + toilet.getState() + ", " + toilet.getPincode());
            Log.e("Data",data);

        }catch (Exception e){

        }


    }
    private void findViews() {
        tvName = (TextView)findViewById( R.id.tv_name );
        tvAddress = (TextView)findViewById( R.id.tv_address );
        tvWritereview = (TextView)findViewById( R.id.tv_writereview );
        tvWritereview.setOnClickListener(this);
        tvReadReview = (TextView)findViewById( R.id.tv_readReview );
        tvReadReview.setOnClickListener(this);
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        overridePendingTransition(R.anim.push_right_in, R.anim.push_right_out);

    }

    @Override
    public void onClick(View v) {

        switch (v.getId()){

            case R.id.tv_writereview:
                Log.e("clicked", "tv_writereview");
                break;
            case R.id.tv_readReview:
                Log.e("clicked", "tv_readReview");

                break;

        }

    }
}
