require 'test_helper'

class ServicesControllerTest < ActionDispatch::IntegrationTest
  test "should get hello" do
    get services_hello_url
    assert_response :success
  end

  test "should get office" do
    get services_office_url
    assert_response :success
  end

  test "should get wax" do
    get services_wax_url
    assert_response :success
  end

  test "should get carpet" do
    get services_carpet_url
    assert_response :success
  end

  test "should get house" do
    get services_house_url
    assert_response :success
  end

  test "should get aircon" do
    get services_aircon_url
    assert_response :success
  end

  test "should get apaman" do
    get services_apaman_url
    assert_response :success
  end

end
