package cfi.hv.com.toiletalert;

import android.Manifest;
import android.content.pm.PackageManager;
import android.location.Location;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.ActivityCompat;
import android.text.Editable;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.google.android.gms.appindexing.Action;
import com.google.android.gms.appindexing.AppIndex;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import cfi.hv.com.toiletalert.baseutilities.BaseActivity;
import cfi.hv.com.toiletalert.constants.Constant;
import cfi.hv.com.toiletalert.constants.Logger;
import cfi.hv.com.toiletalert.dto.Toilet;
import cfi.hv.com.toiletalert.dto.User;
import cfi.hv.com.toiletalert.network.dto.Request;
import cfi.hv.com.toiletalert.network.dto.Response;
import cfi.hv.com.toiletalert.utilities.AppUtility;


public class AddToiletActivity extends BaseActivity implements View.OnClickListener,
        GoogleApiClient.ConnectionCallbacks, GoogleApiClient.OnConnectionFailedListener {
    private EditText toiletName;
    private EditText toiletAddress1;
    private EditText toiletAddress2;
    private EditText toiletCity;
    private EditText toiletDistrict;
    private EditText toiletState;
    private EditText toiletpin;
    private Button butttonSubmit;

    protected GoogleApiClient mGoogleApiClient;
    protected Location mLastLocation;
    protected double latitude;
    protected double longitude;
    /**
     * ATTENTION: This was auto-generated to implement the App Indexing API.
     * See https://g.co/AppIndexing/AndroidStudio for more information.
     */
    private GoogleApiClient client;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_add_tiolet);
        findViews();

        buildGoogleApiClient();
        // ATTENTION: This was auto-generated to implement the App Indexing API.
        // See https://g.co/AppIndexing/AndroidStudio for more information.
        client = new GoogleApiClient.Builder(this).addApi(AppIndex.API).build();
    }

    private void findViews() {
        toiletName = (EditText) findViewById(R.id.toiletName);
        toiletAddress1 = (EditText) findViewById(R.id.toiletAddress1);
        toiletAddress2 = (EditText) findViewById(R.id.toiletAddress2);
        toiletCity = (EditText) findViewById(R.id.toiletCity);
        toiletDistrict = (EditText) findViewById(R.id.toiletDistrict);
        toiletState = (EditText) findViewById(R.id.toiletState);
        toiletpin = (EditText) findViewById(R.id.toiletpin);
        butttonSubmit = (Button) findViewById(R.id.butttonSubmit);
        butttonSubmit.setOnClickListener(this);
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
        if (AppUtility.hasErrorInResponse(response))
            return;
        switch (response.getResponseID()) {
            case 5:
               toiletName.getText().clear();
               toiletAddress1.getText().clear();
               toiletAddress2.getText().clear();
               toiletCity.getText().clear();
                 toiletDistrict.getText().clear();
               toiletState.getText().clear();;
               toiletpin.getText().clear();;

                String s = response.getStrResponse();
                try {
                    JSONObject jsonObject = new JSONObject(s);
                    JSONArray jsonArray = jsonObject.optJSONArray("data");
                    ArrayList<User> arrayListUser = new ArrayList<User>();
                    if (jsonArray != null) {
                        for (int i = 0; i < jsonArray.length(); i++) {
                            JSONObject jsonObject1 = jsonArray.getJSONObject(i);
                            User user = new User();
                            user.fromJSON(jsonObject1.toString());
                            arrayListUser.add(user);
                        }
                    }
                    Logger.d("Respnose : ", arrayListUser.toString());

                    Logger.d("Respnose Size : ", " " + arrayListUser.size());
                } catch (JSONException e) {
                    e.printStackTrace();
                }

                break;

        }
    }


    @Override
    public void onBackPressed() {
        super.onBackPressed();
        overridePendingTransition(R.anim.push_right_in, R.anim.push_right_out);
    }

    @Override
    public void onClick(View v) {

        String toiletname = toiletName.getText().toString();
        String toiletAddress1Text = toiletAddress1.getText().toString();
        String toiletAddress2Text = toiletAddress2.getText().toString();
        String toiletCitytext = toiletCity.getText().toString();
        String toiletDistrictText = toiletDistrict.getText().toString();
        String toiletStateText = toiletState.getText().toString();
        String toiletpinText = toiletpin.getText().toString();
        if (TextUtils.isEmpty(toiletname)) {
            AppUtility.showToast(toiletName, "Enter Toilet Name");
        } else if (TextUtils.isEmpty(toiletAddress1Text)) {
            AppUtility.showToast(toiletName, "Enter Address1");
        } else if (TextUtils.isEmpty(toiletAddress2Text)) {
            AppUtility.showToast(toiletName, "Enter Address2");
        } else if (TextUtils.isEmpty(toiletCitytext)) {
            AppUtility.showToast(toiletName, "Enter City");
        } else if (TextUtils.isEmpty(toiletDistrictText)) {
            AppUtility.showToast(toiletName, "Enter District");
        } else if (TextUtils.isEmpty(toiletStateText)) {
            AppUtility.showToast(toiletName, "Enter State");
        } else if (TextUtils.isEmpty(toiletpinText)) {
            AppUtility.showToast(toiletName, "Enter Pin");

        } else {
            Toilet toilet = new Toilet();
            toilet.setName(toiletname);
            toilet.setAddress1(toiletAddress1Text);
            toilet.setAddress2(toiletAddress2Text);
            toilet.setCity(toiletCitytext);
            toilet.setDistric(toiletDistrictText);
            toilet.setState(toiletStateText);
            toilet.setPincode(toiletpinText);
            toilet.setLati("" + latitude);
            toilet.setLongi("" + longitude);
            JSONObject jsonObject = toilet.toJSON();
            Log.e("json",jsonObject.toString());
            sendRequest(5, Constant.ADD_URL,jsonObject);

        }


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
            longitude = mLastLocation.getLongitude();
//           (String.format("%s: %f", mLongitudeLabel,
//                    mLastLocation.getLongitude()));
        } else {
            Log.i("", "no_location_detected = ");
        }
    }

    @Override
    public void onConnectionFailed(ConnectionResult result) {
        // Refer to the javadoc for ConnectionResult to see what error codes might be returned in
        // onConnectionFailed.
        Log.i("", "Connection failed: ConnectionResult.getErrorCode() = " + result.getErrorCode());
    }


    @Override
    public void onConnectionSuspended(int cause) {
        // The connection to Google Play services was lost for some reason. We call connect() to
        // attempt to re-establish the connection.
        Log.i("", "Connection suspended");
        mGoogleApiClient.connect();
    }
}
