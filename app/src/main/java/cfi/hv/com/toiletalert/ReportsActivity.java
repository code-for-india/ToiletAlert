package cfi.hv.com.toiletalert;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Location;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;

import com.google.android.gms.appindexing.Action;
import com.google.android.gms.appindexing.AppIndex;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.location.LocationServices;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.text.DecimalFormat;
import java.util.ArrayList;

import cfi.hv.com.toiletalert.adapter.LoosAdapter;
import cfi.hv.com.toiletalert.adapter.ReportAdapter;
import cfi.hv.com.toiletalert.baseutilities.BaseActivity;
import cfi.hv.com.toiletalert.constants.Constant;
import cfi.hv.com.toiletalert.constants.Logger;
import cfi.hv.com.toiletalert.dto.Toilet;
import cfi.hv.com.toiletalert.dto.User;
import cfi.hv.com.toiletalert.network.dto.Response;
import cfi.hv.com.toiletalert.utilities.AppUtility;

public class ReportsActivity extends BaseActivity implements AdapterView.OnItemClickListener,View.OnClickListener, GoogleApiClient.ConnectionCallbacks, GoogleApiClient.OnConnectionFailedListener {
private ListView mListView;
    private ArrayList<Toilet> arrToiel = new ArrayList<Toilet>();
    protected GoogleApiClient mGoogleApiClient;
    protected Location mLastLocation;
    protected double latitude;
    protected double longitude;
    private GoogleApiClient client;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_reports);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        mListView = (ListView)findViewById(R.id.listview);
        mListView.setOnItemClickListener(this);
        setSupportActionBar(toolbar);

        buildGoogleApiClient();
        client = new GoogleApiClient.Builder(this).addApi(AppIndex.API).build();
    }

    protected synchronized void buildGoogleApiClient() {
        mGoogleApiClient = new GoogleApiClient.Builder(this)
                .addConnectionCallbacks(this)
                .addOnConnectionFailedListener(this)
                .addApi(LocationServices.API)
                .build();
    }


    @Override
    protected void onStart() {
        super.onStart();
        // ATTENTION: This was auto-generated to implement the App Indexing API.
        // See https://g.co/AppIndexing/AndroidStudio for more information.
        client.connect();
        mGoogleApiClient.connect();
        // ATTENTION: This was auto-generated to implement the App Indexing API.
        // See https://g.co/AppIndexing/AndroidStudio for more information.
        Action viewAction = Action.newAction(
                Action.TYPE_VIEW, // TODO: choose an action type.
                "AddToilet Page", // TODO: Define a title for the content shown.
                // TODO: If you have web page content that matches this app activity's content,
                // make sure this auto-generated web page URL is correct.
                // Otherwise, set the URL to null.
                Uri.parse("http://host/path"),
                // TODO: Make sure this auto-generated app deep link URI is correct.
                Uri.parse("android-app://cfi.hv.com.toiletalert/http/host/path")
        );
        AppIndex.AppIndexApi.start(client, viewAction);
    }

    @Override
    protected void onStop() {
        super.onStop();
        // ATTENTION: This was auto-generated to implement the App Indexing API.
        // See https://g.co/AppIndexing/AndroidStudio for more information.
        Action viewAction = Action.newAction(
                Action.TYPE_VIEW, // TODO: choose an action type.
                "AddToilet Page", // TODO: Define a title for the content shown.
                // TODO: If you have web page content that matches this app activity's content,
                // make sure this auto-generated web page URL is correct.
                // Otherwise, set the URL to null.
                Uri.parse("http://host/path"),
                // TODO: Make sure this auto-generated app deep link URI is correct.
                Uri.parse("android-app://cfi.hv.com.toiletalert/http/host/path")
        );
        AppIndex.AppIndexApi.end(client, viewAction);
        if (mGoogleApiClient.isConnected()) {
            mGoogleApiClient.disconnect();
        }
        // ATTENTION: This was auto-generated to implement the App Indexing API.
        // See https://g.co/AppIndexing/AndroidStudio for more information.
        client.disconnect();
    }

    @Override
    public void onResponseFromServer(Response response) {
        super.onResponseFromServer(response);

        if(response.getResponseID()==10){
            String res = response.getStrResponse();
            Log.d("test", ": resr : " + res);
            try {
                JSONObject jMain = new JSONObject(res);
                JSONArray jArrayData = jMain.optJSONArray("data");
                if(jArrayData==null)
                    return;

                for(int i=0;i<jArrayData.length();i++){
                    Toilet toilet = new Toilet();
                    toilet.fromJSON(jArrayData.get(i).toString());
                    arrToiel.add(toilet);

                }
                setAdapter(arrToiel);
            } catch (JSONException e) {
                e.printStackTrace();
            }
        }
    }

    private void setAdapter(ArrayList<Toilet> toilet) {
        if (toilet != null && !toilet.isEmpty()) {
            ReportAdapter loosAdapter= new ReportAdapter(this, toilet);
            mListView.setAdapter(loosAdapter);
        }
    }

    @Override
    public void onBackPressed() {
        super.onBackPressed();
        overridePendingTransition(R.anim.push_right_in, R.anim.push_right_out);
    }

    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

        Toilet toilet = arrToiel.get(position);
        Intent intent=  new Intent(ReportsActivity.this, ToiletDetailsActivity.class);
        intent.putExtra("Data",toilet.toJSON().toString());
        startActivity(intent);
        overridePendingTransition(R.anim.push_left_in,
                R.anim.push_left_out);


    }


    @Override
    public void onConnected(Bundle connectionHint) {
        // Provides a simple way of getting a device's location and is well suited for
        // applications that do not require a fine-grained location and that do not need location
        // updates. Gets the best and most recent location currently available, which may be null
        // in rare cases when a location is not available.
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return;
        }
        mLastLocation = LocationServices.FusedLocationApi.getLastLocation(mGoogleApiClient);
        if (mLastLocation != null) {

            latitude = mLastLocation.getLatitude();
            DecimalFormat df = new DecimalFormat("#.##");
            String dx=df.format(latitude);
            latitude=Double.valueOf(dx);
            longitude = mLastLocation.getLongitude();
            String dxlong=df.format(longitude);
            longitude=Double.valueOf(dxlong);
            JSONObject jsonObject = new JSONObject();
            try {
                jsonObject.put("lati",""+latitude);
                jsonObject.put("longi",""+longitude);
            } catch (JSONException e) {
                e.printStackTrace();
            }
            sendRequest(10, Constant.URL_SEARCH_LAT_LOG,jsonObject);

        } else {
            Log.i("", "no_location_detected = ");
        }
    }

    @Override
    public void onClick(View v) {
        if(v!=null){
            Toilet tag = (Toilet) v.getTag();
            int id = tag.getId();
            JSONObject jsonObject = new JSONObject();
            try {
                jsonObject.put("loosid",id);
                jsonObject.put("images","");
                jsonObject.put("comment","Loos is too Dirty");
                jsonObject.put("complaintype","authority");
                jsonObject.put("authorityId",25);
                jsonObject.put("nextcomplainid",0);
            } catch (JSONException e) {
                e.printStackTrace();
            }
            sendRequest(10, Constant.COMPLAIN, jsonObject);

        }

    }


    @Override
    public void onConnectionSuspended(int cause) {
        // The connection to Google Play services was lost for some reason. We call connect() to
        // attempt to re-establish the connection.
        Log.i("", "Connection suspended");
        mGoogleApiClient.connect();
    }

    @Override
    public void onConnectionFailed(ConnectionResult connectionResult) {

    }
}
